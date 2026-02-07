let hostName = document.location.href;
let hostNameLink = document.querySelector('.host-name');
hostNameLink.href = hostName;
hostNameLink.innerHTML = hostName;