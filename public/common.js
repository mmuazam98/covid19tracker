let url = window.location.href;
if (url.includes("india")) {
  $("#india").addClass("active");
  // link.classList.add("active")
  document.title = "Cases in India";
} else if (url.includes("kashmir")) {
  $("#kashmir").addClass("active");
  document.title = "Cases in Kashmir";
} else if (url.includes("global.php")) {
  $("#global").addClass("active");
  document.title = "Global Cases";
} else {
  $("#home").addClass("active");
  document.title = "COVID19 Tracker";
}
function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
const counters = document.querySelectorAll(".counter");
const speed = 100;

counters.forEach((counter) => {
  // console.log(counter)
  const updateCount = () => {
    const target = +counter.getAttribute("data-target");
    const count = +counter.innerText;
    // console.log(target)
    const inc = target / speed;
    if (count < target) {
      let x = parseInt(count + inc);
      counter.innerText = x;

      setTimeout(updateCount, 10);
    } else {
      counter.innerText = numberWithCommas(target);
    }
  };
  updateCount();
});
const indianData = document.querySelectorAll(".value");
indianData.forEach((data) => {
  data.innerText = numberWithCommas(data.innerText);
});
const newData = document.querySelectorAll(".data");
newData.forEach((data) => {
  data.innerText = numberWithCommas(data.innerText);
});
