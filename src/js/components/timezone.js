// Timezone
(function($) {
   $(document).ready(function() {
    setInterval(updateTimezone(), 60000);
   });

  function updateTimezone() {
    $('[data-timezone]').each(function() {
      const city = $(this).attr('data-timezone');
      getTimeForCity($(this),city);
    });
  }
})(jQuery);



function getTimeForCity(target,city) {
  const timezones = {
    Dubai: 4,          // UTC+4
    Tokyo: 9,          // UTC+9
    Sydney: 10,        // UTC+10
    San_Francisco: -7, // UTC-7
    New_York: -4,      // UTC-4
    London: 1,         // UTC+1 (during daylight saving time, otherwise UTC)
    Singapore: 8       // UTC+8
  };

  const offset = timezones[city];

  if (offset === undefined) {
    console.error(`Timezone not found for city: ${city}`);
    return;
  }

  // Get the current local time
  const localTime = new Date();
  
  // Calculate the UTC time by adding the local timezone offset
  const utcTime = localTime.getTime() + (localTime.getTimezoneOffset() * 60000);
  
  // Calculate the time for the city by applying the city's timezone offset (in hours)
  const cityTime = new Date(utcTime + (offset * 3600000));

  // Format the time in 12-hour AM/PM format
  const options = { 
    hour: 'numeric', 
    minute: 'numeric', 
    hour12: true
  };
  const formattedTime = cityTime.toLocaleString('en-US', options);

  // Replace the HTML element's text with the formatted time
  target.text(formattedTime);
}
