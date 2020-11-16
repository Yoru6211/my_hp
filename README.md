# my_hp

撮影した写真を公開するためのホームページです。

## 概要
撮影した写真に加えて、写真の情報（撮影機種、焦点距離、撮影モード、絞り、シャッタースピード、ISO感度、露出補正、ホワイトバランス）も合わせて
公開しています。

<img src="https://github.com/Yoru6211/my_hp/blob/archive/my_hp_images01.png" width="400" height="380">
<img src="https://github.com/Yoru6211/my_hp/blob/archive/my_hp_images02.png" width="400" height="380">
<img src="https://github.com/Yoru6211/my_hp/blob/archive/my_hp_images03.png" width="400" height="380">
<img src="https://github.com/Yoru6211/my_hp/blob/archive/my_hp_profile.png" width="400" height="380">
<img src="https://github.com/Yoru6211/my_hp/blob/archive/my_hp_contact.png" width="400" height="380">

## 使用言語
・HTML
・CSS
・JavaScript
・PHP

## Webサーバー
・nginx

## データベース
・MySQL 8.0.22
 
## ソースコード・バージョン管理
・git
 -Github
　
## 開発環境
・macOS Catalina 10.15.7
・Docker 19.03.8<br>
・Docker-compose 1.25.0
 
## 本番環境
・AWS<br>
・インスタンスタイプ-EC2<br>
・AMI - ubuntu20.04
 
## テスト
・手動テスト
対象ブラウザ：chrome/safari/firefox/Microsofe Edge
対象デバイス：Macbookpro/WindowsPC/iPhpneXR/iPad6
以下はクリアしています。
(1)画面幅を変えた時レイアウトが崩れないか
(2)メニューボタンを高速で連打してもエラーが起きないか

## 開発工程
今回ローカル開発環境としてMacbookへDockerとDocker-composeをインストール、DockerfileとDocker-compose.ymlファイルを作成してnginx/php/mysql
のイメージを作成し、それらのイメージを元にコンテナを構築しました。


 
## 作成情報
・作成者:Ren Hattori
・Email:ren.h.contact@gmail.com 
