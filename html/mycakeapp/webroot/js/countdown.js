window.addEventListener('DOMContentLoaded', () => {

  const endTime = new Date(endtime);

  countdown = () => {
    const now = new Date();
    const remainingTime = endTime - now;
    const sec = Math.floor(remainingTime / 1000 % 60);
    const min = Math.floor(remainingTime / 1000 / 60) % 60;
    const hours = Math.floor(remainingTime / 1000 / 60 / 60) % 24;
    const days = Math.floor(remainingTime / 1000 / 60 / 60 / 24);
    const count = [days, hours, min, sec]; 

    if(remainingTime > 0){
      return count;
    } else {
      document.getElementById('countdown').textContent = 'オークションは終了しました';
    }
  };

  perSecond = () => {
    setTimeout(() => {
      update();
    }, 1000);
  };
  
  update = () => {
    const counter = countdown();
    const showCountdown = '残り' + counter[0] + '日' + counter[1] + '時間' + counter[2] + '分' + counter[3] + '秒';
    document.getElementById('countdown').textContent = showCountdown;
    perSecond();
  };
  
  update();

}, false); 
