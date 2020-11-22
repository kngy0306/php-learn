<?php

declare(strict_types=1);

// トランプクラス
class PlayingCards
{

    // 52枚のカードの配列
    private $cards;

    // コンストラクタ
    public function __construct()
    {
    }

    // カードをシャッフルする
    public function shuffle(): void
    {
        echo 'シャッフルします...', PHP_EOL;
    }

    // 指定された位置のカードの数字を返す
    public function getValue(int $position): ?string
    {
        return '5'; // ここでは固定値を返す
    }
}
