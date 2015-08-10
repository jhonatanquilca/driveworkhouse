<?php if (Yii::app()->user->hasFlash('loginflash')): ?>
    <div class="alert alert-error">
        <?php echo Yii::app()->user->getFlash('loginflash'); ?>
    </div>
<?php else: ?>
    <div class="panel heading-border panel-info mt1 br-n">
        <!--<div class="panel-heading ">-->
        <!--</div>-->


        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'logon-form',
            'htmlOptions' => array(
                'style' => '
    margin-bottom: 0px; !important
',
            ),
            'enableClientValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
        <div class="panel-body bg-light ptn pb15">
            <div class="section-divider mv30">
            <!--<span style="background: #FAFAFA;"><?php echo CrugeTranslator::t('logon', 'Login to your account') ?></span>-->
                <span style="background: #FAFAFA;"><?php echo CrugeTranslator::t('logon', 'Accede a tu cuenta') ?></span>
            </div>
    

            <div class="control-group  <?php echo isset($model->getErrors()['username'])?'error':''  ?> ">

                <label for="CrugeLogon_username" class="control-label text-muted fs18 mb10 required">Usuario</label>
                <div class="controls">
                    <label for="CrugeLogon_username" class="field prepend-icon">
                        <?php
                        echo $form->textField($model, 'username', array(
                            'placeholder' => CrugeTranslator::t(
                                    'logon', 'Username'
                            ), 'class' => 'gui-input')
                        );
                        ?>
                        <label for="CrugeLogon_username" class="field-icon">
                            <i class="fa fa-user"></i>
                        </label>
                    </label>

                </div>
    <?php echo $form->error($model, 'username', array('style' => 'color: #b94a48;')); ?>
            </div>
            <div class="control-group <?php echo isset($model->getErrors()['password'])?'error':''  ?>">

                <label for="CrugeLogon_password" class="control-label text-muted fs18 mb10 required">Password</label>
                <div class="controls">
                    <label for="CrugeLogon_password" class="field prepend-icon">

                        <?php
                        echo $form->passwordField($model, 'password', array(
                            'placeholder' => CrugeTranslator::t(
                                    'logon', "Password"
                            ), 'class' => 'gui-input'
                        ));
                        ?>
                        <label for="CrugeLogon_password" class="field-icon">
                            <i class="fa fa-lock"></i>
                        </label>
                    </label>

                </div>
    <?php echo $form->error($model, 'password', array('style' => 'color: #b94a48;')); ?>
            </div>
        </div>
        <div class="panel-footer clearfix">

            <label class="switch ib switch-primary mt10">
                <!--<input type="checkbox" name="CrugeLogon[rememberMe]" id="CrugeLogon_rememberMe">-->
    <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'origen')); ?>

                <label for="CrugeLogon_rememberMe" data-on="SI" data-off="NO"></label>
                <span>Recordarme</span>
            </label>


            <button class="button btn-primary mr10 pull-right" type="submit">
    <?php echo CrugeTranslator::t('logon', "Login") ?>                           
            </button>
            <script type="text/javascript">

                $('div.forgot>a').attr('class', 'forgot');
            </script>

        </div>



        <?php
        /* if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
          echo Yii::app()->user->ui->registrationLink; */
        ?>
        <?php
        //	si el componente CrugeConnector existe lo usa:
        //
        if (Yii::app()->getComponent('crugeconnector') != null) {
            if (Yii::app()->crugeconnector->hasEnabledClients) {
                ?>
                <div class='crugeconnector'>
                    <span><?php echo CrugeTranslator::t('logon', 'You also can login with'); ?>:</span>
                    <ul>
                        <?php
                        $cc = Yii::app()->crugeconnector;
                        foreach ($cc->enabledClients as $key => $config) {
                            $image = CHtml::image($cc->getClientDefaultImage($key));
                            echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                        }
                        ?>
                    </ul>
                </div>

                <?php
            }
        }
        ?>

    <?php $this->endWidget(); ?>
    </div>
    <!--<div class="login-links" ">-->
            <!--<p>-->
    <?php // echo Yii::app()->user->ui->passwordRecoveryLink;  ?>

    <!--</p>-->
    <!--<p>Haven't yet Registered?-->
    <!--<a href="pages_login-alt.html" title="Sign In">Sign up here</a>-->
    <!--</p>-->
    <!--</div>-->

    <!-- Registration Links(alt) -->
    <!--    <div class="login-links ">
            <a href="pages_forgotpw(alt).html" class="active" title="Sign In">Sign In</a> |
            <a href="pages_register(alt).html" class="" title="Register">Register</a>
        </div>-->
<?php endif; ?>
   
