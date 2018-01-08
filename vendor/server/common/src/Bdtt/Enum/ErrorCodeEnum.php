<?php

/**
 * Description of ErrorCodeEnum
 *
 * @author DeanHD
 */

namespace Bdtt\Enum;

class ErrorCodeEnum
{
    const OAUTH_FAILED = 15000;
    const FORBIDDEN_WORDS = 90000;

    const ARTICLE_VOTE_UNFIND = 1121;

    const VERSION_INCORRECT = 4001;

    const USER_ACTION_ADD = 2001;
    const USER_ACTION_UPDATE = 2002;

    /**
     *    5.2+使用ApiErrorCode
     *
     **/
    const DISCLOSE_NOT_SAVE = 3002;
    const DISCLOSE_NOT_FOUND = 3001;
    const CHANNEL_LIST_INDEX_INVALID = 1020;
    const ACTIVITY_DETAIL_UNFIND = 1401;
    const ACTIVITY_SUBMIT_FORMAT = 1402;
    const ACTIVITY_SUBMIT_ENTER_COUNT = 1403;
    const INVITE_CODE_NOT_FOUND = 3101;
    const PICTURE_NOT_SAVE = 3102;
    const VOTE_ILLEGAL = 3103; // 已经达到每日投票最大值
    const NO_NEW_LIST = 3105;
    const NO_LANDING = 3106;
    const USE_SELF_INVITE_CODE = 3107;
    const ACTIVITY_IS_DELETE = 3108;
    const ACTIVITY_USER_IS_DELETE = 3109;
    const VOTE_OUT_OF_TIME = 3110;
    const TURNTABLE_RAFFLE_IS_NULL = 3201;
}
