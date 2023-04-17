function showOption() {
  const selectedOption = document.getElementById("programOption").value;
  const hiddenOption1 = document.getElementById("option1");
  const hiddenOption2 = document.getElementById("option2");
  const hiddenOption3 = document.getElementById("option3");
  const hiddenOption4 = document.getElementById("option4");

  if (selectedOption == "1") {
    hiddenOption1.style.display = "block";
  } else {
    hiddenOption1.style.display = "none";
  }

  if (selectedOption == "2") {
    hiddenOption2.style.display = "block";
  } else {
    hiddenOption2.style.display = "none";
  }

  if (selectedOption == "3") {
    hiddenOption3.style.display = "block";
  } else {
    hiddenOption3.style.display = "none";
  }

  if (selectedOption == "4") {
    hiddenOption4.style.display = "block";
  } else {
    hiddenOption4.style.display = "none";
  }
}
