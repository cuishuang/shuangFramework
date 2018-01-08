<?php
/**
 * Created by PhpStorm.
 * User: sephiroth
 * Date: 17-3-27
 * Time: 下午2:38
 */
namespace Bdtt\Enum;

class MessageEnum
{
    const INVITATION = 1; //我邀请的用户激活我拿话费奖励
    const MYARTCLECOMMENTBECOMMENT = 2; //我的文章评论被评论
    const MYARTCLECOMMENTBEADMIRE = 3; //我的文章评论被点赞
    const MYFEEDBECOMMENT = 4; //我的动态被评论
    const MYFEEDBEADMIRE = 5; //我的动态被点赞
    const OTHERCOMMENTINMYFEEDBECOMMENT = 6; //我的动态里某人的评论被另一人评论
    const MYCOMMENTINOTHERFEEDBECOMMENT = 7; //我在别人动态里的评论被评论
    const POINTBYFEED = 8; //动态获得积分
    const POINTBYCOMMENT = 9; //评论获得积分
    const FEEDBEDELETE = 10; //动态被删除
    const FEEDCOMMENTBEDELETE = 11; //评论被删除
    const NOTICETOCIRCLEADMIN = 12; //发送动态时提示管理员
    const CUSTOMIZE = 13; //自定义消息
}
