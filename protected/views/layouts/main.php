<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>::PLK-43 DATACENTER</title>        

        <link rel='shortcut icon' type='image/x-icon' href='<?php echo Yii::app()->request->baseUrl; ?>/medical.ico' />
       
    </head>

    <body>
        <div class="nav navbar-inverse" style="color: whitesmoke;padding: 15px">
            <h4>
                <i class="glyphicon glyphicon-th-large"></i>
                PLK-43 DATACENTER
            </h4>
        </div>


        <?php
        $amp = Yii::app()->user->getState('amp');
        $role = Yii::app()->user->getState('role');
        $isAdmin = FALSE;
        if ($role === 'admin') {
            $isAdmin = TRUE;
        }

        $this->widget(
                'ext.booster.widgets.TbNavbar', array(
            'brand' => FALSE,
            'fixed' => false,
            'fluid' => true,
            'items' => array(
                array(
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'items' => array(
                        array('label' => 'หน้าหลัก', 'icon' => 'glyphicon glyphicon-home', 'url' => array('/site/index')),
                        array('label' => 'ส่งแฟ้ม', 'icon' => 'glyphicon glyphicon-floppy-disk', 'url' => array('/app/upload')),
                        array('label' => 'รายงาน', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => '#',
                            'items' => array(
                                array('label' => 'ประวัติการส่งข้อมูล', 'url' => array('/report/statupload')),
                            )
                        ),
                        array('label' => 'ข้อมูลตัวชี้วัด', 'icon' => 'glyphicon glyphicon-flag', 'url' => array('/site/kpi')),
                        array('label' => 'ข่าวประกาศ', 'icon' => 'glyphicon glyphicon-comment', 'url' => array('/site/news')),
                        array('label' => 'โปรแกรมเกี่ยวข้อง', 'icon' => 'glyphicon glyphicon glyphicon-fire', 'url' => array('/site/tools')),
                        array('label' => 'เกี่ยวกับ', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => array('/site/about')),
                        array('label' => 'Login', 'icon' => 'glyphicon glyphicon-user', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'ผู้ใช้: (' . Yii::app()->user->getState('fullname') . ')', 'url' => '#', 'visible' => !Yii::app()->user->isGuest,
                            'items' => array(
                                array('label' => 'ตั้งค่า', 'url' => array('/User/Update', 'id' => Yii::app()->user->id)),
                                array('label' => 'จัดการผู้ใช้', 'url' => array('/User/Admin'), 'visible' => $isAdmin),
                                '---',
                                array('label' => 'ออกจากระบบ', 'url' => array('/Site/Logout')),
                            )
                        )
                    )
                )
            )
                )
        );
        ?>
        <div style="padding-left:30px;padding-right: 10px;">

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('booster.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>
        </div>
        <hr>

        <div style="padding-top: 3px" align="center">
            Copyright &copy; <?php echo date('Y'); ?> by 
            <?php echo CHtml::link('WWW.PLKHEALTH.GO.TH', 'http://www.plkhealth.go.th', array('target' => '_blank')); ?>
            All Rights Reserved.

        </div><!-- footer -->

        <br>
        <div align="center">
            <!-- Histats.com  START  (standard)-->
            <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
            <a href="http://www.histats.com" target="_blank" title="counter statistics" ><script  type="text/javascript" >
                try {
                    Histats.start(1, 2717808, 4, 2041, 130, 60, "00011101");
                    Histats.track_hits();
                } catch (err) {
                }
                ;
                </script></a>
            <noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2717808&101" alt="counter statistics" border="0"></a></noscript>
            <!-- Histats.com  END  -->
        </div>

    </body>
</html>
