document.addEventListener("DOMContentLoaded", () => {
  const countrySelect = document.getElementById("country-select");
  const stateSelect = document.getElementById("state-select");
  const selectNumber = document.getElementById("select-number");
  const selectPlan = document.getElementById("select-plan");
  const selectYourCountry = document.getElementById("select-your-country");

  // Disable other selects at the beginning
  stateSelect.disabled = true;
  selectNumber.disabled = true;
  selectPlan.disabled = true;
  selectYourCountry.disabled = true;

  countrySelect.addEventListener("change", (e) => {
    const selectedCountry = e.target.value;
    let stateOptions = [];

    switch (selectedCountry) {
      case "United Kingdom":
        stateOptions = [
          { text: "Select State" },
          { text: "Birmingham (1213)", value: "Birmingham" },
          { text: "London (203)", value: "London" },
          { text: "Liverpool (151)", value: "Liverpool" },
        ];
        break;
      case "Brazil":
        stateOptions = [
          { text: "Select State" },
          { text: "Belo Horizonte", value: "Belo Horizonte" },
          { text: "Rio De Janeiro", value: "Rio De Janeiro" },
          { text: "Sao Paulo", value: "Sao Paulo" },
        ];
        break;
      case "Belgium":
        stateOptions = [
          { text: "Select State" },
          { text: "Antwerp", value: "Antwerp" },
          { text: "Brussels", value: "Brussels" },
          { text: "Charleroi", value: "Charleroi" },
        ];
        break;
      case "Australia":
        stateOptions = [
          { text: "Select State" },
          { text: "Brisbane", value: "Brisbane" },
          { text: "Melbourne", value: "Melbourne" },
          { text: "Sydney", value: "Sydney" },
        ];
        break;
      default:
        stateOptions = [{ text: "Select State", value: "" }];
    }

    // Clear previous options
    stateSelect.innerHTML = "";
    stateOptions.forEach((option) => {
      const opt = document.createElement("option");
      opt.text = option.text;
      opt.value = option.value;
      stateSelect.add(opt);
    });

    // Enable stateSelect and reset others
    stateSelect.disabled = false;
    selectNumber.disabled = true;
    selectPlan.disabled = true;
    selectYourCountry.disabled = true;
    selectNumber.innerHTML = "";
    selectPlan.innerHTML = "";
    selectYourCountry.innerHTML = "";
  });

  stateSelect.addEventListener("change", (e) => {
    const selectedState = e.target.value;
    let phoneNumbers = [];

    switch (selectedState) {
      case "Birmingham":
        phoneNumbers = [
          "Select Number",
          "+44 12123 45674",
          "+44 121 987 6543",
          "+44 121 555 1234",
        ];
        break;
      case "London":
        phoneNumbers = [
          "Select Number",
          "020 123 4567",
          "020 987 6543",
          "020 555 1234",
        ];
        break;
      case "Liverpool":
        phoneNumbers = [
          "Select Number",
          "0151 123 4567",
          "0151 987 6543",
          "0151 555 1234",
        ];
        break;
      case "Belo Horizonte":
        phoneNumbers = [
          "Select Number",
          "+55 31 1234 5678",
          "+55 31 9876 5432",
          "+55 31 5551 2345",
        ];
        break;
      case "Rio De Janeiro":
        phoneNumbers = [
          "Select Number",
          "+55 21 1234 5678",
          "+55 21 9876 5432",
          "+55 21 5551 2345",
        ];
        break;
      case "Sao Paulo":
        phoneNumbers = [
          "Select Number",
          "+55 11 1234 5678",
          "+55 11 9876 5432",
          "+55 11 5551 2345",
        ];
        break;
      case "Antwerp":
        phoneNumbers = [
          "Select Number",
          "+32 3 123 4567",
          "+32 3 987 6543",
          "+32 3 555 1234",
        ];
        break;
      case "Brussels":
        phoneNumbers = [
          "Select Number",
          "+32 2 123 4567",
          "+32 2 987 6543",
          "+32 2 555 1234",
        ];
        break;
      case "Charleroi":
        phoneNumbers = [
          "Select Number",
          "+32 71 123 4567",
          "+32 71 987 6543",
          "+32 71 555 1234",
        ];
        break;
      case "Brisbane":
        phoneNumbers = [
          "Select Number",
          "+61 71 123 4567",
          "+61 71 987 6543",
          "+61 71 555 1234",
        ];
        break;
      case "Melbourne":
        phoneNumbers = [
          "Select Number",
          "+61 71 123 4567",
          "+61 71 987 6543",
          "+61 71 555 1234",
        ];
        break;
      case "Sydney":
        phoneNumbers = [
          "Select Number",
          "+61 71 123 4567",
          "+61 71 987 6543",
          "+61 71 555 1234",
        ];
        break;
      default:
        phoneNumbers = [];
    }

    // Clear previous options
    selectNumber.innerHTML = "";
    phoneNumbers.forEach((phoneNumber) => {
      const opt = document.createElement("option");
      opt.text = phoneNumber;
      opt.value = phoneNumber;
      selectNumber.add(opt);
    });

    // Enable selectNumber
    selectNumber.disabled = false;
    selectPlan.disabled = true;
    selectYourCountry.disabled = true;
    selectPlan.innerHTML = "";
    selectYourCountry.innerHTML = "";
  });

  selectNumber.addEventListener("change", () => {
    const planOptions = [
      { text: "Select Plan" },
      { text: "Standard - Free (Monthly)", value: "Standard" },
      { text: "Premium - $9.95 (Monthly)", value: "Premium" },
    ];

    selectPlan.innerHTML = "";
    planOptions.forEach((plan) => {
      const opt = document.createElement("option");
      opt.text = plan.text;
      opt.value = plan.value;
      selectPlan.add(opt);
    });

    // Enable selectPlan
    selectPlan.disabled = false;
    selectYourCountry.disabled = true;
    selectYourCountry.innerHTML = "";
  });

  selectPlan.addEventListener("change", () => {
    const countryOptions = [
      { text: "Your Country " },
      { text: "Botswana", value: "Botswana" },
      { text: "Belarus", value: "Belarus" },
      { text: "Andorra", value: "Andorra" },
      { text: "American Samoa", value: "American Samoa" },
      { text: "Albania", value: "Albania" },
    ];

    selectYourCountry.innerHTML = "";
    countryOptions.forEach((country) => {
      const opt = document.createElement("option");
      opt.text = country.text;
      opt.value = country.value;
      selectYourCountry.add(opt);
    });

    // Enable selectYourCountry
    selectYourCountry.disabled = false;
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const slider = document.getElementById('minutesSlider');
  const minutesDisplay = document.getElementById('minutesDisplay');

  slider.addEventListener('input', (event) => {
      const minutes = parseInt(event.target.value, 10);
      minutesDisplay.textContent = `${minutes} minutes`;
  });
});
