window.addEventListener('DOMContentLoaded', () => {

  const endTime = new Date(JSON.parse(endTimeJson));

  const countdown = () => {
    const now = new Date();
    const remainingTime = endTime - now;
    const sec = Math.floor(remainingTime / 1000 % 60);
    const min = Math.floor(remainingTime / 1000 / 60) % 60;
    const hours = Math.floor(remainingTime / 1000 / 60 / 60) % 24;
    const days = Math.floor(remainingTime / 1000 / 60 / 60 / 24);
    const count = [days, hours, min, sec]; 

      return count;
  };

  const update = () => {
    const counter = countdown();
    if(counter[0] > 0 || counter[1] > 0 || counter[2] > 0 || counter[3] > 0){
      const showCountdown = '残り' + counter[0] + '日' + counter[1] + '時間' + counter[2] + '分' + counter[3] + '秒';
      document.getElementById('countdown').textContent = showCountdown;
      perSecond();
    } else {
      document.getElementById('countdown').textContent = 'オークションは終了しました';
    }
  };

  const perSecond = () => {
    setTimeout(() => {
      update();
    }, 1000);
  };
  
  update();

}, false); 