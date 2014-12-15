<?php
class MessageController extends UserAreaController
{
    public function actionHistory($userId = null)
    {
        $messages     = $this->user->messages;
        $participants = Message::getParticipants($messages);
        $messageCount = [];

        sort($participants);

        foreach ($participants as $participant){
            $messageCount[$participant->id]= count(array_filter($messages, function (Message $message) use ($participant) {
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

        $pages = new CPagination($messageCount);
        $pages->setPageSize(10);

        $this->render('history',[
            'messages' => array_filter($messages, function (Message $message) use ($currentParticipant) {
                return $message->userFrom->id == $currentParticipant->id
                    || $message->userTo->id == $currentParticipant->id;
            }),
            'participants' => $participants,
            'currentParticipant' => $currentParticipant,
            'messageCount' => $messageCount,
            'pages' => $pages
        ]);
    }


}
