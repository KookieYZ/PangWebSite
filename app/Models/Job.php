<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'note',
        'image_path',
        'category',
        'salary',
        'background',
        'address',
        'posted_on',
        'status'
    ]; 

    protected $jobCategoryList = array(
        'AF' => '会计与金融',
        'HR' => '行政/人力资源',
        'SM' => '销售与市场营销',
        'AMC' => '艺术/媒体/通讯',
        'SER' => '服务',
        'HOR'=> '酒店/餐厅',
        'ET' => '教育/培训',
        'IT' => '计算机/信息技术',
        'ENGE' => '工程',
        'MANU' => '制造业',
        'BUL' => '建筑/施工',
        'SC' => '科学',
        'HC' => '卫生保健',
        'OTH' => '其他'
    );

    public function getCatList(){
        return $this->jobCategoryList;
    }

    public function getFullCategoryName($catCode){
        return $this->jobCategoryList[$catCode];
    }

 
}

