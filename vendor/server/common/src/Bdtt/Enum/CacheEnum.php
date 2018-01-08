<?php

/**
 * Description of CacheEnum
 * 缓存相关设置枚举
 * @author Dean
 */

namespace Bdtt\Enum;

class CacheEnum
{
    /* config中配置项名称 */
    const DB_DEFAULT     = 'redis_default';
    const DB_NEWS        = 'redis_news';
    const DB_LOGIN       = 'redis_login';
    const DB_ENDPOINT    = 'redis_endpoint';
    const DB_SECURITY    = 'redis_security';
    const DB_CHANNELLIST = 'redis_channellist';
    const DB_CIRCLE      = 'redis_circle';
    const DB_USER        = 'redis_user';

    /* api,lts 在用*/
    const REGION_INFO          = 'region:region-info'; //每一个地域的信息
    const WEATHER_BY_REGION    = 'weather:region';
    const MJ_WEATHER_BY_REGION = 'weather:moji:region';

    /* lts 在用*/
    const REGION_NAME_WITH_ID     = 'region:name'; //记录每一个城市名称对应的regionId
    const REWARD_REGION_CITY_LIST = 'reward:city-list'; //有奖邀请地域精确到市级的regionid

    /* lts comment circle */
    const USER_PUBLISH_STATUS   = 'user:publish-status:'; //用户禁言状态
    const GLOBAL_PUBLISH_STATUS = 'global:publish-status'; //全局禁言状态

    const LOGIN_STATUS  = 'login:status:'; //登录状态
    const ENDPOINT_UDID = 'endpoint:udid:'; //终端的设备id

    const ARTICLE_DETAIL = 'article:detail:'; //文章详情
    const USER_COMMENT   = 'user:comment:'; //用户对文章评论点赞记录
    const PUSH_NEWS      = 'push:news:'; //推送消息

    const ACTIVITY_TURNTABLE_PRIZEDRAW                = 'activity:turntable_prizedraw'; //转盘活动有奖信息
    const ACTIVITY_TURNTABLE_COUPON                   = 'activity:turntable_coupon'; //转盘活动优惠券信息
    const ACTIVITY_UDID_MAINCOUPON_COUNT              = 'activity:udid_maincoupon_count'; //每类优惠券每个设备获取数
    const ACTIVITY_MAINCOUPON_MAX_NUM                 = 'activity:maincoupon_max_num'; //每类优惠券最大可获取数
    const ACTIVITY_PRIZEDRAW_ALREADY_RECEIVE          = 'activity:prizadraw_already_receive'; //奖品已经被领取的
    const ACTIVITY_COUPON_ALREADY_RECEIVE             = 'activity:coupon_already_receive'; //优惠券已经被领取的
    const ACTIVITY_UUID_SHARE_NUM                     = 'activity:uuid_share_num'; //每个udid分享次数
    const ACTIVITY_MAINCOUPON_SURPLUS                 = 'activity:maincoupon_surplus'; //每个无码优惠码剩余数量
    const ACTIVITY_ALREADY_RECEIVE_COUPON_WITHOUTCODE = 'activity:without_code_already_receive'; //每个活动已经领取无码优惠券数量

    const Ask_Fate_Num_Udid                 = 'ask_fate_num_udid';
    const VOTE_SORT                         = 'activity:vote_sort'; //维护投票排序
    const LOCAL_CIRCLE_CHANNEL              = 'local_circle:channel'; //本地圈频道列表缓存
    const LOCAL_CIRCLE_FEED_CONTENT         = 'local_circle:feedcontent'; // 本地圈内容缓存
    const LOCAL_CIRCLE_CHANNELID_BY_KEYWORD = 'local_circle:channelId'; //通过标签获取频道Id
    const LOCAL_CIRCLE_ADMIRE               = 'local_circle:admire'; // 用户uid与feedid的点赞关系
    const LOCAL_CIRCLE_TAG                  = 'local_circle:tag'; //本地圈标签列表缓存
    const LOCAL_CIRCLE_ADMIRE_COUNT         = 'local_circle:admire_count'; //本地圈点赞数
    const LOCAL_CIRCLE_COMMENT_COUNT        = 'local_circle:comment_count'; //本地圈评论数
    const LOCAL_CIRCLE_COMMENT              = 'local_circle:commentids'; // 本地圈评论ids
    const LOCAL_CIRCLE_COMMENT_CONTENT      = 'local_circle:commentInfo'; //本地圈评论信息
    const LOCAL_CIRCLE_CHANNEL_KEYWORD      = 'local_circle:channel_keyword'; //获取本地圈频道的关键字

    const USER_INFO = 'user_info'; //储存用户的缓存信息
}
