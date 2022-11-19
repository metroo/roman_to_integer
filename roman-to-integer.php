<?php
class Solution {

    public $parentList = array('I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000);
    public $sum = 0;
    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        if(!(1 <= strlen($s) and strlen($s) <= 15)){
            return 'invalid length';
        }
        $arrayStr = str_split($s);
        for($i=0;$i<sizeof($arrayStr);$i++){
            if(array_key_exists($arrayStr[$i] , $this->parentList )){
                $num = $this->parentList[$arrayStr[$i]];
                switch ($arrayStr[$i]) {
                    case 'I':
                        switch ($arrayStr[$i+1]) {
                            case 'V':$num = 4;$i++;
                                break;
                            case 'X':$num = 9;$i++;
                                break;
                        }
                        break;
                    case 'X':
                        switch ($arrayStr[$i+1]) {
                            case 'L':$num = 40;$i++;
                                break;
                            case 'C':$num = 90;$i++;
                                break;
                        }
                        break;
                    case 'C':
                        switch ($arrayStr[$i+1]) {
                            case 'D':$num = 400;$i++;
                                break;
                            case 'M':$num = 900;$i++;
                                break;
                        }
                        break;
                }
                $this->sum += $num;
            }
        }
        return $this->sum;
    }
}

$p= new Solution();
echo "<br> sum : ".$p->romanToInt("MCMXCIV");
?>