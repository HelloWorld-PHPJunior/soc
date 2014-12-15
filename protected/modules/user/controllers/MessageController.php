<?php
class MessageController extends UserAreaController
{
    public function actionHistory($userId = null)
    {
        $allMessages  = $this->user->messages;
        $participants = Message::getParticipants($allMessages);
        $participantsMessageCount = [];

        sort($participants);

        foreach ($participants as $participant){
            $participantsMessageCount[$participant->id]= count(array_filter($allMessages, function (Message $message) use ($participant) {
                return $message->userFrom->id == $participant->id
                || $message->userTo->id == $participant->id;
            }));
        }

        $currentParticipant = empty($userId)
            ? $participants[0]
            : User::model()->findByPk($userId);


        if (Yii::app()->request->isPostRequest){
            $message = new Message();
            $message->user_from_id = $this->user->id;
            $message->user_to_id = $currentParticipant->id;
            $message->body = $_POST['Message']['body'];
            $message->created_at = date('Y-m-d H:i:s');

            if ($message->save()) {
                $this->redirect($this->createUrl('/user/message/history', ['userId' => $currentParticipant->id]));
            }
        }

        $criteria = new CDbCriteria();
        $criteria->condition = '
            (user_from_id = :user_id AND user_to_id = :participant_id)
            OR (user_to_id = :user_id AND user_from_id = :participant_id)';

        $criteria->params = [
            ':user_id' => $this->user->id,
            ':participant_id' => $currentParticipant->id
        ];

        $criteria->order = 'created_at DESC';
        $count = Message::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->setPageSize(5);
        $pages->applyLimit($criteria);


        $messages = Message::model()->findAll($criteria);
        $dataProvider = new CArrayDataProvider($messages, [
            'pagination' => $pages
        ]);

        $this->render('history',[
            'messages' => $dataProvider->getData(),
            'participants' => $participants,
            'currentParticipant' => $currentParticipant,
            'participantsMessageCount' => $participantsMessageCount,
            'pages' => $pages
        ]);
    }


}
