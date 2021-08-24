<?php

return [
    'login' => [
        
        'validate' => [
            'email_required' => '이메일을 입력해 주세요!',
            'email_email' => '올바른 이메일 형식이 아닙니다.',
            'password_required' => '비밀번호를 입력해 주세요!',
        ],

        'notification' => [
            'loginSuccess' => '성공적으로 로그인했습니다!',
            'logoutSuccess' => '사용자가 성공적으로 로그아웃했습니다.',
            'logoutFailed' => '죄송합니다. 사용자는 로그아웃할 수 없습니다.',
            'invalid' => '잘못된 이메일 또는 비밀번호.',
            'failedToken' => '토큰 생성 실패.',
        ]
    ],
];