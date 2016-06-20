<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //主页显示
    public function index() {
        import('ORG.Util.Page');
        if(is_login()) {
            $data['uname'] = session('uname');
        } else {
           
        }

        $Goods = M('goods');
        $type_id = I('get.type_id');

        if(empty($type_id)) {
            $goods = $Goods
                        ->join('wellbad ON goods.goods_id = wellbad.goods_id')
                        ->order('wells DESC')
                        ->limit(6)
                        ->select();
            $data['goods'] = $goods;
        } else {
            $type_id = I('get.type_id');
            $map['type_id'] = $type_id;

            //分页效果
            $count =$Goods->where($map)->count();
            $page = new \Think\PageBootcss($count, 6);
            $limit = $page->firstRow.','.$page->listRows;
            $goods = $Goods
                        ->where($map)
                        ->order('goods_id DESC')
                        ->limit($limit)
                        ->select();

            $data['goods'] = $goods;
            $this->page = $page->show();
          
        }

        
        $goodtype = M('goodtype')
                    ->select();
        $data['goodtype'] = $goodtype;
        $this->uname = session('uname');
        $this->assign('data',$data);
        $this->display();
    }

    //商品详情
    public function good_info() {
        $goods_id = I('get.goods_id');
        $Goods = M('goods');
        $WellBad = M('wellbad');
        $Comment = M('comment');
        $map['goods_id'] = $goods_id;

        $count = $Comment->where($map)->count();
        $page = new \Think\PageBootcss($count, 6);
        $limit = $page->firstRow.','.$page->listRows;
        $comment = $Comment
                    ->where($map)
                    ->order('cmt_id DESC')
                    ->limit($limit)
                    ->select();

        $good = $Goods
                    ->where($map)
                    ->find();
        $wellbad = $WellBad
                    ->where($map)
                    ->find();
                    
        $this->page = $page->show();
        $this->comment = $comment;
        $this->good = $good;
        $this->wellbad = $wellbad;
        $this->uname = session('uname');
        $this->display();
    }
    
    //搜索商品
    public function search() {
        $goods_name = I('get.search_name');
        $Goods = M('goods');
        $map['goods_name'] = array('like' , "%$goods_name%");

        $count = $Goods->where($map)->count();
        $page = new \Think\PageBootcss($count, 6);
        $limit = $page->firstRow.','.$page->listRows;
        $goods = $Goods
                    ->where($map)
                    ->order('goods_id DESC')
                    ->limit($limit)
                    ->select();

        $data['goodtype'] = M('goodtype')->select();
        $data['goods'] = $goods;
        $this->page = $page->show();
        $this->uname = session('uname');
        $this->assign('data',$data);
        $this->display('index2');
    }

    //客服中心
    public function server_center() {
        $uname = session('uname');

        $this->uname = $uname;
        $this->display();
    }
}