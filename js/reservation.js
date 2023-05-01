// form reservation
const form = document.getElementById("reservation-form");
form.addEventListener("submit", (event) => {
  event.preventDefault();

  const fullname = encodeURIComponent(
    document.getElementById("fullname").value
  );
  const phone = encodeURIComponent(document.getElementById("phone").value);
  const email = encodeURIComponent(document.getElementById("email").value);
  const date = encodeURIComponent(document.getElementById("date").value);
  const time = encodeURIComponent(document.getElementById("time").value);
  const guests = encodeURIComponent(document.getElementById("guests").value);

  const inputElements = document.querySelectorAll('[type="checkbox"]');
  const values = [];
  inputElements.forEach(function (element) {
    if (element.checked) {
      values.push(encodeURIComponent(element.value));
    }
  });
  const string = values.join(",+");

  // url whatsapp
  const whatsappURL = `https://api.whatsapp.com/send?phone=6285213835314&text=Halo+Resto+Danau+Abah%2C+Saya+telah+mengisi+form+untuk+reservasi+di+website.%0D%0A%0D%0ANama+%3A+${fullname}%0D%0ANo.+HP+%3A+${phone}%0D%0AEmail+%3A+${email}%0D%0A%0D%0ASaya+ingin+reservasi+pada+%3A%0D%0ATanggal+%3A+${date}%0D%0AJam+%3A+${time}%0D%0AJumlah+Tamu+%3A+${guests}+orang%0D%0A%0D%0ASpecial+Request+(Tempat)+%3A+${string}.%0D%0A%0D%0ADitunggu+informasi+selanjutnya.+Terima+kasih.
  `;

  window.open(whatsappURL);
});
