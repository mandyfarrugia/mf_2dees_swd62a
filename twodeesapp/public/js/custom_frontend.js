const displayErrorAlert = (message) => {
    const ALERT_DURATION_MILLISECONDS = 5000;
    const containerAfterMain = document.querySelector('main.py-5 > .container');
    const errorAlertDivElement = document.createElement('div');
    errorAlertDivElement.setAttribute('class', 'alert alert-danger');
    errorAlertDivElement.innerHTML = message;
    containerAfterMain.prepend(errorAlertDivElement);
    setTimeout(() => errorAlertDivElement.style.display = 'none', ALERT_DURATION_MILLISECONDS);
};

const reportError = (message) => {
    displayErrorAlert(message);
    throw new Error(message);
};

const attachQueryParametersToUrl = (parameters) => {
    const currentUrl = new URL(window.location.href);
    const queryParameters = new URLSearchParams(currentUrl.search);

    Object.entries(parameters).forEach(([parameter, value]) => {
        queryParameters.delete(parameter);
        queryParameters.append(parameter, value);
    });

    currentUrl.search = queryParameters.toString();
    return currentUrl;
};

const handleSearch = (searchTerm) => {
    if(searchTerm == '') {
        let errorMessage = 'Nothing to see here... yet. Type something and we will make some magic happen!';
        reportError(errorMessage);
    }
    else {
        window.location.href = attachQueryParametersToUrl({'search': searchTerm});
    }
}

const handlePriceFilter = (minimum, maximum) => {
    if (maximum < minimum) {
        let errorMessage = 'Maximum threshold cannot be less than minimum threshold!';
        reportError(errorMessage);
    }

    window.location.href = attachQueryParametersToUrl({ 'min_price': minimum, 'max_price': maximum });
};

const handleDateDropdownSelection = (event) => {
    let target = event.target;
    let selectedOrderId = target.value || target.options[target.selectedIndex].value;
    window.location.href = attachQueryParametersToUrl({ 'date': selectedOrderId });
};

const handleCategoryDropdownSelection = (event) => {
    let target = event.target;
    let selectedCategoryId = target.value || target.options[target.selectedIndex].value;
    window.location.href = attachQueryParametersToUrl({ 'category_id': selectedCategoryId });
};

const attachEvent = (target, event, callback) => target.addEventListener(event, callback);

const categoryFilterDropdown = document.getElementById('filter_category_id');
const dateFilterDropdown = document.getElementById('filter_date');
const applyFilterBtn = document.getElementById('apply_filter_btn');
const searchBtn = document.getElementById('btn_search');
const searchInput = document.getElementById('search_input');

const arrowFilterBtn = document.querySelectorAll('#arrow_filter');

if (categoryFilterDropdown !== null) {
    attachEvent(categoryFilterDropdown, 'change', (event) => {
        handleCategoryDropdownSelection(event);
    });

    attachEvent(dateFilterDropdown, 'change', (event) => {
        handleDateDropdownSelection(event);
    });

    attachEvent(applyFilterBtn, 'click', (event) => {
        event.preventDefault();

        let minPrice = document.getElementById('min_price').value;
        let maxPrice = document.getElementById('max_price').value;

        if(minPrice === '') {
            minPrice = 0;
        }

        minPrice = parseFloat(minPrice);
        maxPrice = parseFloat(maxPrice);

        if(isNaN(minPrice) || isNaN(maxPrice)) {
            displayErrorAlert('Please ensure that prices are in numeric format!');
        }
        else {
            handlePriceFilter(minPrice, maxPrice);
        }
    });

    attachEvent(searchBtn, 'click', () => handleSearch(searchInput.value));

    attachEvent(searchInput, 'keydown', (event) => {
        if(event.keyCode == 13) {
            let target = event.target;
            handleSearch(target.value);
        }
    });

    arrowFilterBtn.forEach((arrow) => {
        let headerName = arrow.previousSibling.textContent.trim(); //Use trim() to remove extra whitespace as textContent tends to leave trailing whitespace at the end of the string when accessing previousSibling property.
        console.log(headerName);
    })

    // attachEvent(arrowFilterBtn, 'click', (event) => {
    //     console.log(event.target.previousSibling.textContent.trim());
    //     console.log(event.target.previousSibling.textContent.trim() == 'Release Date');
    // });
};