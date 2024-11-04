"use strict";


// // audio 要素を取得
// const audioElem = document.querySelector('audio');
 
// // 上記で取得した audio 要素を渡して初期化
// const audioPlayer = new MediaElementPlayer(audioElem, {
//   //オプションの設定オブジェクト（省略可能なオプション）
//   audioWidth : 320,  // 幅を指定
//   audioHeight: 40,  // 高さを指定
//   startVolume: 1.0,  // 初期ボリュームを指定
//   iconSprite: './wp-content/themes/izumi/mediaelementplayer/mejs-controls.svg',  // アイコンファイルの場所を指定
// });


// audio 要素を取得
const audioElem = document.querySelector('audio');

// メディアエレメントプレイヤーを初期化する関数
function initializeMediaElementPlayer() {
  const viewportWidth = window.innerWidth;

  // 画面幅に基づいてaudioWidthを設定（320pxを最大とし、375pxまでの範囲でスケーリング）
  const audioWidth = Math.max(241, Math.min(440, viewportWidth * 0.8));

  // 上記で取得した audio 要素を渡して初期化
  const audioPlayer = new MediaElementPlayer(audioElem, {
    // オプションの設定オブジェクト（省略可能なオプション）
    audioWidth: audioWidth,  // 幅を指定
    audioHeight: 40,  // 高さを指定
    startVolume: 1.0,  // 初期ボリュームを指定
    iconSprite: '.home/sujahta/www/wp/wp-content/themes/izumi/mediaelementplayer/mejs-controls.svg',  // アイコンファイルの場所を指定
  });

  audioElem.player = audioPlayer;
}

// 初期化を呼び出し
initializeMediaElementPlayer();

// 画面幅が変更されたときに再初期化
window.addEventListener('resize', () => {
  const viewportWidth = window.innerWidth;

  // 画面幅に基づいてaudioWidthを設定
  const audioWidth = Math.max(241, Math.min(440, viewportWidth * 0.8));

  // プレイヤーのwidthプロパティを更新
  if (audioElem.player) {
    audioElem.player.setPlayerSize(audioWidth, 40);
  }
});
