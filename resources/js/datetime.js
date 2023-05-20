const MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'Septemeber', 'October', 'November', 'December'];

const dateField = document.querySelector('#intervalDate');
const timeField = document.querySelector('#intervalTime');

if(dateField) {

    const updateDateTime = () => {
        const currentDateTime = new Date();
        dateField.innerText = `${MONTHS[currentDateTime.getMonth()]} ${currentDateTime.getDate()}, ${currentDateTime.getFullYear()}`
    
        if(timeField) {
            const currentTime = tConvert(`${addLeadingZero(currentDateTime.getHours())}:${addLeadingZero(currentDateTime.getMinutes())}:00`)
            timeField.innerText = `${currentTime.split(':')[0]}:${currentTime.split(':')[1]} ${currentTime.split(':')[2].slice('2')}`;
        }
    }

    setInterval(updateDateTime, 1000);
}

function tConvert (time) {
    time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
  
    if (time.length > 1) { 
      time = time.slice (1);  
      time[5] = +time[0] < 12 ? 'AM' : ' PM'; 
      time[0] = +time[0] % 12 || 12; 
    }
    return time.join ('');
}

function addLeadingZero(num) {
    return (num < 10) ? ("0" + num) : num;
}
