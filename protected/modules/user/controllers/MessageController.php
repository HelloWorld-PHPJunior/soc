<?php
class MessageController extends UserAreaController
{
    public function actionHistory($userId = null)
    {

        if (Yii::app()->request->isPostRequest && !empty($userId)){
            $message = new Message();
            $message->user_from_id = $this->user->id;
            $message->user_to_id = $userId;
            $message->body = $_POST['Message']['body'];
            $message->created_at = date('Y-m-d H:i:s');
            $message->save();
            $this->user->refresh();
        }




        $allMessages  = $this->user->messages;
        $participants = array_filter(Message::getParticipants($allMessages), function($user) {
            return $user->id != $this->user->id;
        });

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


        $criteria = new CDbCriteria();
        $criteria->condition = '
            (user_from_id = :user_id AND user_to_id = :participant_id)
            OR (user_to_id = :user_id AND user_from_id = :participant_id)';

        $criteria->params = [
            ':user_id' => $this->user->id,
            ':participant_id' => $currentParticipant->id
        ];

        $criteria->order = 'created_at DESC';


        $dataProvider = new CActiveDataProvider('Message', [
            'pagination' => [
                'pageSize' => 5
            ],
            'criteria' => $criteria,
        ]);

        $this->render('history',[
            'messages' => $dataProvider->getData(),
            'participants' => $participants,
            'currentParticipant' => $currentParticipant,
            'participantsMessageCount' => $participantsMessageCount,
            'pagination' => $dataProvider->getPagination()
        ]);
    }


}
