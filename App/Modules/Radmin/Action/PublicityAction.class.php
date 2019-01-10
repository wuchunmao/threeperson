<?php

/**
 * 	topos经销商管理系统
 */
class publicityAction extends CommonAction {
    
    //获取表名
    private function get_model(){
        
        return 'Publicity';
    }
    
    //获取该栏目中文名字
    private function get_name(){
        
        return '宣传信息';
    }


    //产品宣传信息
    public function index() {
        $model_name = $this->get_model();
        
        $list = D($model_name)->find();

        //如果没有记录则创建一条记录
        if (empty($list)) {
            $row = array(
                'id' => 1,
                'news' => '请填写信息',
            );
            $res = M($model_name)->add($row);
        }

        $this->list = $list;
        $this->display();
    }

    //编辑宣传信息
    public function edit() {
        $model_name = $this->get_model();
        
        $row = D($model_name)->find();
        $this->row = $row;
        $this->display();
    }
    
    public function update() {
        $model_name = $this->get_model();

        $news = I('post.disc');

        $news = stripslashes($news);
        $news = preg_replace("/&amp;/", "&", $news);
        $news = preg_replace("/&quot;/", "\"", $news);
        $news = preg_replace("/&lt;/", "<", $news);
        $news = preg_replace("/&gt;/", ">", $news);
        $data['news'] = $news;
        $list = D($model_name)->find();
        if (empty($list)) {
            $row = array(
                'id' => 1,
                'news' => $news,
            );
            $res = M($model_name)->add($row);
        }else{
            $res = D($model_name)->where(array('id' => "1"))->save($data);
        }

        if ($res === false) {
            $this->error("操作失败");
        } else {
            $name = $this->get_name();
            $this->add_active_log('编辑'.$name);
            $this->success("操作成功");
        }
    }

    /**
     * +-------------------------------------------------
     * 上传图片
     * +-------------------------------------------------
     * @param string $name
     * +-------------------------------------------------
     * @return string $info(中文提示)
     * +-------------------------------------------------
     */
    function upload() {
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $upload->maxSize = 1048576;
        $upload->allowExts = array('jpg', 'png', 'jpeg', 'bmp', 'pic'); // 设置附件上传类型
        $upload->savePath = './img/';
        $upload->uploadReplace = false; //存在同名文件是否是覆盖
        $upload->thumbRemoveOrigin = "true";
        $upload->autoSub = true;    //是否以子目录方式保存
        $upload->subType = 'date';  //可以设置为hash或date
        $upload->dateFormat = 'Ym';
        $upload->subType = 'date';  //可以设置为hash或date
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        } else {

            $info = $upload->getUploadFileInfo();
            $image = $info[0]['savepath'] . $info[0]['savename'];
            return __ROOT__ . substr($image, 1);
        }
    }

}

?>