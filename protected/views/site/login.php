<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="glyphicon glyphicon-user" style="padding-right: 3px"></i>
            เข้าระบบ
        </h3>
    </div>
    <div class="panel-body">

        <?php
        $form = $this->beginWidget(
                'booster.widgets.TbActiveForm', array(
            'id' => 'login-form',
            //'type' => 'horizontal',
            'htmlOptions' => array('class' => 'well'), // for inset effect
                )
        );

        echo $form->textFieldGroup($model, 'username');
        echo $form->passwordFieldGroup($model, 'password');
        echo $form->checkboxGroup($model, 'rememberMe');
        $this->widget(
                'booster.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Login')
        );

        $this->endWidget();
        unset($form);
        ?>

    </div>
</div>
