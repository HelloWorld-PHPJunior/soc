<?php
class MessageController extends UserAreaController
{
    public function actionHistory($userId = null)
    {
        $messages     = $this->user->messages;
        $participants = Message::getParticipants($messages);

        $currentParticipant = empty($userId)
            ? current($participants)
            : User::model()->findByPk($userId);


        $this->render('history',[
            'messages' => array_filter($messages, function (Message $message) use ($currentParticipant) {
                return $message->userFrom->id == $currentParticipant->id
                    || $message->userTo->id == $currentParticipant->id;
            }),
            'participants' => $participants,
            'currentParticipant' => $currentParticipant
        ]);
    }


}
