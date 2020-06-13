<?php
    class check_code{
        static private $image;
        static private $width;
        static private $height;
        static public $value="";

        static public function get_image($width,$height){
               // 囤主题 www.tzhuti.com   =$_SESSION['code'];
                if (!isset($_SESSION)) {
                    session_start();
                }

               $code_num = 6;

               self::$width=$width;
               self::$height=$height;
               self::$image=imagecreatetruecolor($width,$height);// 囤主题 www.tzhuti.com   创建一张图片，默认输出黑色背景
               $bgcolor=imagecolorallocate(self::$image,rand(200,255),rand(200,255),rand(200,255));// 囤主题 www.tzhuti.com   申请颜色
               imagefill(self::$image,0,0,$bgcolor);// 囤主题 www.tzhuti.com   区域填充
               self::code_letter($code_num);

               $_SESSION['zrz_check_code'] = self::$value;
               header('Content-type: image/gif');
               imagegif(self::$image,NULL,0,NULL);// 囤主题 www.tzhuti.com   输出图片

               imagedestroy(self::$image);// 囤主题 www.tzhuti.com   释放资源
           }

        /* 囤主题 www.tzhuti.com
        *英文随机验证码
        *@param integer $num 产生多少位的随机英文验证码
        */
        static private function code_letter($num){
            $filename = array('AgentOrange','Cartoonia_3D','False_3d','From_Cartoon_Blocks','MinginBling','MomsDiner','planet_benson_2','PWHappyChristmas');
            $font_address= dirname(__FILE__).DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.$filename[array_rand($filename,1)].'.ttf';// 囤主题 www.tzhuti.com   字体文件地址
            $data="ABCDEFGHJKMNPQRSTUVWXYZ";
            for($i=0;$i<$num;$i++){
                $fontsize=30;
                $fontcolor=imagecolorallocate(self::$image,132,132,132);// 囤主题 www.tzhuti.com   0,120是代表随机的深色颜色
                $fontcontent=substr($data,rand(0,strlen($data)-1),1);// 囤主题 www.tzhuti.com   随机英文内容
                if(is_numeric($fontcontent)){
                    self::$value.=$fontcontent;// 囤主题 www.tzhuti.com   随机英文内容
                }else{
                    self::$value.=strtolower($fontcontent);// 囤主题 www.tzhuti.com   随机英文内容
                }
                $x=$i*self::$width/$num+2;// 囤主题 www.tzhuti.com   x坐标
                $y=(self::$height/2)+($fontsize/2);
                $anger=0;
                ImageTTFText(self::$image,$fontsize,$anger,$x,$y,$fontcolor,$font_address,$fontcontent);
            }
        }

    }
     check_code::get_image(200,45);
