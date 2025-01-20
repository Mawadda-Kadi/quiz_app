// Update footer with current time
const updateTime = () => {
    const currentTimeElement = document.getElementById('current-time');
    const now = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    };
    currentTimeElement.textContent = now.toLocaleString('en-US', options);
};

// Update the time every second
setInterval(updateTime, 1000);
updateTime();