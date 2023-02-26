'use strict';
//削除ボタンがクリックされた際にダイアログ表示
let btn = document.getElementById('btn');

btn.addEventListener('click', function() {
 
    window.confirm('削除しますか？');
 
});

