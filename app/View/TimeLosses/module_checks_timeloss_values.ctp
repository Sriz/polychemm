<?php 


        $test_timeloss_min = $this->TimeLoss->find('all',['fields'=>['DISTINCT totalloss','id'],'order'=>['totalloss asc']]);
        


        foreach($test_timeloss_min as $minute){
            
            $yo = $minute['TimeLoss']['totalloss'];
            
            
            $length =  strlen($yo);
            if($length == 8){

                $hour = substr($yo,3,2);
                $day = substr($yo,0,2);
                $min = substr($yo, 6,2);

                if(($day==00 || $day==0) and $hour==00 and $min==00)//TTT
                $totalloss_sec_new = "0";
                else if(($day==00 || $day==0) and $hour!=00 and $min==00)//THT
                    $totalloss_sec_new = $hour*3600;
                else if(($day==00 || $day==0) and $hour!=00 and $min!=00)//THH
                    $totalloss_sec_new = $hour*3600+$min*60;
                else if(($day==00 || $day==0) and $hour==00 and $min!=00)//TTH
                    $totalloss_sec_new = $min*60;

                else if(($day!=00 || $day!=0) and $hour!=00 and $min!=00)//HHH
                    $totalloss_sec_new = $day*86400+$hour*3600+$min*60;
                else if(($day!=00 || $day!=0) and $hour==00 and $min!=00)//HTH
                    $totalloss_sec_new = $day*86400+$min*60;
                else if(($day!=00 || $day!=0) and $hour==00 and $min==00)//HTT
                    $totalloss_sec_new = $day*86400;
                else if(($day!=00 || $day!=0) and $hour!=00 and $min==00)//HHT
                    $totalloss_sec_new = $day*86400+$hour*3600;
                else
                    $totalloss_sec_new = 0;

            }
            else if($length == 7){

                $hour = substr($yo,2,2);
                $day = substr($yo,0,1);
                $min = substr($yo, 5,2);

                if($day==0 and $hour==00 and $min==00)//TTT
                $totalloss_sec_new = "0";
                else if($day==0 and $hour!=00 and $min==00)//THT
                    $totalloss_sec_new = $hour*3600;
                else if($day==0 and $hour!=00 and $min!=00)//THH
                    $totalloss_sec_new = $hour*3600+$min*60;
                else if($day==0 and $hour==00 and $min!=00)//TTH
                    $totalloss_sec_new = $min*60;

                else if($day!=0 and $hour!=00 and $min!=00)//HHH
                    $totalloss_sec_new = $day*86400+$hour*3600+$min*60;
                else if($day!=0 and $hour==00 and $min!=00)//HTH
                    $totalloss_sec_new = $day*86400+$min*60;
                else if($day!=0 and $hour==00 and $min==00)//HTT
                    $totalloss_sec_new = $day*86400;
                else if($day!=0 and $hour!=00 and $min==00)//HHT
                    $totalloss_sec_new = $day*86400+$hour*3600;
                else
                    $totalloss_sec_new = 0;

            }
            
            $id = $minute['TimeLoss']['id'];
            
            $test = $this->TimeLoss->query("select totalloss_sec from time_loss where id=$id")[0]['time_loss']['totalloss_sec'];
            if($test!=$totalloss_sec_new){
                //update totalloss_sec
                $test = $this->TimeLoss->query("update time_loss set totalloss_sec=$totalloss_sec_new where id=$id");

            }
            
        }


?>