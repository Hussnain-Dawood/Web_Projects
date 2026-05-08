// layout.js
document.addEventListener("DOMContentLoaded", async () => {
  try {
    const headerResponse = await fetch("header.html");
    const headerHtml = await headerResponse.text();
    document.getElementById("site-header").innerHTML = headerHtml;

    const footerResponse = await fetch("footer.html");
    const footerHtml = await footerResponse.text();
    document.getElementById("site-footer").innerHTML = footerHtml;
  } catch (error) {
    console.error("Error loading layout:", error);
  }
});
