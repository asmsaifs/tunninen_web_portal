<?php

namespace app\blocks;

use cmsadmin\Module;
use Yii;
use luya\helpers\Url;
use yii\helpers\Html;

class ContactFormBlock extends \cmsadmin\base\Block
{
    public $module = 'cmsadmin';

    public $_parser = null;

    public $defaultNameLabel = 'Name';
    public $defaultNamePlaceholder = 'First and Last Name';
    public $defaultNameError = 'Please enter a name';

    public $defaultEmailLabel = 'Email';
    public $defaultEmailPlaceholder = 'abc@abc.com';
    public $defaultEmailError = 'Please enter an e-mail address';

    public $defaultMessageLabel = 'Message';
    public $defaultMessageError = 'Please enter a message';

    public $defaultSendLabel = 'Submit Message';

    public $defaultSendError = 'Unfortunately an error occurred during sending the message.';
    public $defaultSendSuccess = 'Thank you very much! We will get in touch with you.';

    public $defaultMailSubject = 'Contact inquiry';
    public $defaultSubjectPlaceholder = 'Contact inquiry';
    public $defaultSubjectError = 'Please enter a subject';

    public function name()
    {
        return 'Contact Form';
    }

    public function icon()
    {
        return 'email';
    }

    public function config()
    {
        return [
            'vars' => [
                ['var' => 'headline', 'label' => 'Heading', 'type' => 'zaa-text', 'placeholder' => 'Contact'],
                ['var' => 'nameLabel', 'label' => 'Text for "Name"', 'type' => 'zaa-text', 'placeholder' => $this->defaultNameLabel],
                ['var' => 'emailLabel', 'label' => 'Text for "Email"', 'type' => 'zaa-text', 'placeholder' => $this->defaultEmailLabel],
                ['var' => 'subjectLabel', 'label' => 'Text for "Subject"', 'type' => 'zaa-text', 'placeholder' => $this->defaultMailSubject],
                ['var' => 'messageLabel', 'label' => 'Text for "Message"', 'type' => 'zaa-text', 'placeholder' => $this->defaultMessageLabel],
                ['var' => 'sendLabel', 'label' => 'Text on the Submit button', 'type' => 'zaa-text', 'placeholder' => $this->defaultSendLabel],
                ['var' => 'emailAddress', 'label' => 'Email will be sent to the following address', 'type' => 'zaa-text'],
            ],

            'cfgs' => [
                ['var' => 'subjectPlaceholder', 'label' => 'Subject in the email', 'type' => 'zaa-text', 'placeholder' => $this->defaultSubjectPlaceholder],
                ['var' => 'namePlaceholder', 'label' => 'Placeholder for field "Name"', 'type' => 'zaa-text', 'placeholder' => $this->defaultNamePlaceholder],
                ['var' => 'emailPlaceholder', 'label' => 'Placeholder for field "Email"', 'type' => 'zaa-text', 'placeholder' => $this->defaultEmailPlaceholder],
                ['var' => 'nameError', 'label' => 'Placeholder for field "Name"', 'type' => 'zaa-text', 'placeholder' => $this->defaultNameError],
                ['var' => 'emailError', 'label' => 'Placeholder for field "Email"', 'type' => 'zaa-text', 'placeholder' => $this->defaultEmailError],
                ['var' => 'messageError', 'label' => 'Placeholder for field "Message"', 'type' => 'zaa-text', 'placeholder' => $this->defaultMessageError],
                ['var' => 'sendSuccess', 'label' => 'Confirmation text after submitting the form', 'type' => 'zaa-text', 'placeholder' => $this->defaultSendSuccess],
                ['var' => 'sendError', 'label' => 'Error text following failed attempt to send the form', 'type' => 'zaa-text', 'placeholder' => $this->defaultSendError],
            ],
        ];
    }

    public function extraVars()
    {
        return [
            'nameLabel' => $this->getVarValue('nameLabel', $this->defaultNameLabel),
            'namePlaceholder' => $this->getCfgValue('namePlaceholder', $this->defaultNamePlaceholder),
            'nameError' => $this->getCfgValue('nameError', $this->defaultNameError),
            'emailLabel' => $this->getVarValue('emailLabel', $this->defaultEmailLabel),
            'emailPlaceholder' => $this->getCfgValue('emailPlaceholder', $this->defaultEmailPlaceholder),
            'emailError' => $this->getCfgValue('emailError', $this->defaultEmailError),
            'messageLabel' => $this->getVarValue('messageLabel', $this->defaultMessageLabel),
            'messageError' => $this->getCfgValue('messageError', $this->defaultMessageError),
            'sendLabel' => $this->getVarValue('sendLabel', $this->defaultSendLabel),
            'sendError' => $this->getCfgValue('sendError', $this->defaultSendError),
            'sendSuccess' => $this->getCfgValue('sendSuccess', $this->defaultSendSuccess),            
            'subjectLabel' => $this->getCfgValue('subjectLabel', $this->defaultMailSubject),
            'subjectPlaceholder' => $this->getCfgValue('subjectPlaceholder', $this->defaultSubjectPlaceholder),
            'subjectError' => $this->getCfgValue('subjectError', $this->defaultSubjectError),
            'message' => Yii::$app->request->post('message'),
            'name' => Yii::$app->request->post('name'),
            'email' => Yii::$app->request->post('email'),
            'subject' => Yii::$app->request->post('subject'),
            'mailerResponse' => $this->getPostResponse(),
            'csrf' => Yii::$app->request->csrfToken,
            'nameErrorFlag' => Yii::$app->request->isPost ? (Yii::$app->request->post('name') ? 1 : 0): 1,
            'emailErrorFlag' => Yii::$app->request->isPost ? (Yii::$app->request->post('email') ? 1 : 0): 1,
            'messageErrorFlag' => Yii::$app->request->isPost ? (Yii::$app->request->post('message') ? 1 : 0): 1,
        ];
    }

    public function sendMail($message, $email, $name)
    {
        $email = Html::encode($email);
        $name = Html::encode($name);
        
        $html = "<p>You have recieved an E-Mail via Form Block on " . Url::base(true)."</p>";
        $html.= "<p>From: " . $name." ($email)<br />Time:".date("d.m.Y - H:i"). "<br />";
        $html.= "Message:<br />" . nl2br(Html::encode($message)) ."</p>";
        
        $mail = Yii::$app->mail;
        $mail->fromName = $name;
        $mail->from = $email;
        $mail->compose($this->getVarValue('subjectLabel', $this->defaultMailSubject), $html);
        $mail->address($this->getVarValue('emailAddress'));

        if (!$mail->send()) {
            return 'Error: '.$mail->error;
        } else {
            return 'success';
        }
    }

    public function getPostResponse()
    {
        $request = Yii::$app->request;

        if (Yii::$app->request->isPost) {
            if ($request->post('message') && $request->post('email') && $request->post('name')) {
                return $this->sendMail($request->post('message'), $request->post('email'), $request->post('name'));
            }
        }
    }

    /**
     * @todo: add prefix to encapsulate block ids
     */
    public function Frontend()
    {
        return  '<article> <div class="post-image">'.
                '<div class="post-heading">'.                                
                '{% if vars.emailAddress is not empty %}{% if vars.headline is not empty %}<h3>{{ vars.headline }}</h3>{% endif %}'.
                '</div>'.    
                    '<h4>Get in touch with us by filling <strong>contact form below</strong></h4>'.
                    '{% if extras.name and extras.email and extras.message %}'.
                        '{% if extras.mailerResponse == "success" %}'.
                            '<div class="alert alert-success">{{ extras.sendSuccess }}</div>'.
                         '{% else %}'.
                            '<div class="alert alert-danger">{{ extras.mailerResponse }}</div>'.
                        '{% endif %}'.
                    '{% endif %}'.
                    '<form id="contactform" class="form-horizontal" role="form" method="post" action="">'.
                        '<input type="hidden" name="_csrf" value="{{extras.csrf}}" />'.
                        '<div class="row">'.                                    
                        '<div class="col-lg-4 field">'.
                            '<input type="text" id="name" name="name" placeholder="{{ extras.namePlaceholder }}" value="{% if extras.mailerResponse != "success" %}{{ extras.name }}{% endif %}">'.
                            '{% if not extras.nameErrorFlag%}<p class="text-danger">{{ extras.nameError }}</p>{% endif %}'.
                        '</div>'.
                        '<div class="col-lg-4 field">'.
                            '<input type="text" id="email" name="email" placeholder="{{ extras.emailPlaceholder }}" value="{% if extras.mailerResponse != "success" %}{{ extras.email }}{% endif %}">'.
                            '{% if not extras.emailErrorFlag %}<p class="text-danger">{{ extras.emailError }}</p>{% endif %}'.
                        '</div>'.
                        '<div class="col-lg-4 field">'.
                            '<input type="text" id="subject" name="subject" placeholder="{{ extras.subjectPlaceholder }}" value="{% if extras.mailerResponse != "success" %}{{ extras.subject }}{% endif %}">'.
                            '{% if not extras.emailErrorFlag %}<p class="text-danger">{{ extras.subjectError }}</p>{% endif %}'.
                        '</div>'.
                        '<div class="col-lg-12 margintop10 field">'.
                            '<textarea rows="4" name="message" placeholder="Your message here..">{% if extras.mailerResponse != "success" %}{{ extras.message }}{% endif %}</textarea>'.
                            '{% if not extras.messageErrorFlag %}<p class="text-danger">{{ extras.messageError }}</p>{% endif %}'.
                            '<p>'.
                            '<button class="btn btn-theme margintop10 pull-left" type="submit">Submit message</button>'.
                            '<span class="pull-right margintop20">* Please fill all required form field, thanks!</span> </p>'.
                        '</div>'.
                    '</div></form>'.
                    '{% endif %}'.
                    '</div></article>';
    }

    public function twigAdmin()
    {
        return  '<p><i>Form Block</i></p>{% if vars.emailAddress is not empty %}'.
                    '{% if vars.headline is not empty %}<h3>{{ vars.headline }}</h3>{% endif %}'.
                        '<div class="input input--text">'.
                            '<label for="name" class="input__label">{{ extras.nameLabel }}</label>'.
                            '<div class="input__field-wrapper"><input id="name" class="input__field" disabled="disabled" /></div>'.
                        '</div>'.
                        '<div class="input input--text">'.
                        '<label for="name" class="input__label">{{ extras.emailLabel }}</label>'.
                        '<div class="input__field-wrapper"><input id="name" class="input__field" disabled="disabled" /></div>'.
                        '</div>'.
                        '<div class="input input--text">'.
                        '<label for="name" class="input__label">{{ extras.subjectLabel }}</label>'.
                        '<div class="input__field-wrapper"><input id="name" class="input__field" disabled="disabled" /></div>'.
                        '</div>'.
                        '<div class="input input--text">'.
                        '<label for="name" class="input__label">{{ extras.messageLabel }}</label>'.
                        '<div class="input__field-wrapper"><textarea class="input__field" disabled="disabled" /></div>'.
                        '</div>'.
                        '<button class="btn" disabled>{{ extras.sendLabel }}</button>'.
                    '{% else %}<span class="block__empty-text">Es wurde noch keine Emailadresse angegeben.</span>'.
                '{% endif %}';
    }
}
