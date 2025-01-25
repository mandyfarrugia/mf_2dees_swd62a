const removeProfilePicture = (event) => {
    let form = event.target.parentElement;
    form.submit();
};

const displayErrorAlert = (message) => {
    const ALERT_DURATION_MILLISECONDS = 5000;
    const containerAfterMain = document.querySelector('main.py-5 > .container');
    const errorAlertDivElement = document.createElement('div');
    errorAlertDivElement.setAttribute('class', 'alert alert-danger');
    errorAlertDivElement.innerHTML = message;
    containerAfterMain.prepend(errorAlertDivElement);
    setTimeout(() => errorAlertDivElement.remove(), ALERT_DURATION_MILLISECONDS);
};

const lower = (value) => value.toLowerCase();

const formQueryParameterFromHeader = (header) => {
    let headerParts = header.split(' ');
    return headerParts.map(lower).join('_');
}

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
    if (searchTerm == '') {
        let errorMessage = 'Nothing to see here... yet. Type something and we will make some magic happen!';
        reportError(errorMessage);
    }
    else {
        window.location.href = attachQueryParametersToUrl({ 'search': searchTerm });
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
    window.location.href = attachQueryParametersToUrl({ 'release_date': selectedOrderId });
};

const handleCategoryDropdownSelection = (event) => {
    let target = event.target;
    let selectedCategoryId = target.value || target.options[target.selectedIndex].value;
    window.location.href = attachQueryParametersToUrl({ 'category_id': selectedCategoryId });
};

const processViewMode = (parameter, currentViewMode) => {
    let viewModeValue = null;

    if (currentViewMode === 'fa-table') {
        viewModeValue = 'table';
    }
    else if (currentViewMode === 'fa-images') {
        viewModeValue = 'cards';
    }

    window.location.href = attachQueryParametersToUrl({ [parameter]: viewModeValue });
};

const processSort = (parameter, arrowDirection) => {
    let sortValue = null;

    if (arrowDirection === 'fa-arrow-up') {
        sortValue = 'desc';
    } else if (arrowDirection === 'fa-arrow-down') {
        sortValue = 'asc';
    }

    window.location.href = attachQueryParametersToUrl({ [parameter]: sortValue });
}

const attachEvent = (target, event, callback) => target.addEventListener(event, callback);

const categoryFilterDropdown = document.getElementById('filter_category_id');
const dateFilterDropdown = document.getElementById('filter_date');
const applyFilterBtn = document.getElementById('apply_filter_btn');
const searchBtn = document.getElementById('btn_search');
const searchInput = document.getElementById('search_input');
const viewModeBtn = document.getElementById('view_mode');
const removeProfilePictureBtn = document.getElementById('btn_remove_profile_picture');

const arrowFilterBtn = document.querySelectorAll('#arrow_filter');
const deleteBtns = document.querySelectorAll('.btn-delete');

if (categoryFilterDropdown !== null) {
    attachEvent(categoryFilterDropdown, 'change', (event) => {
        handleCategoryDropdownSelection(event);
    });
}

if (dateFilterDropdown !== null) {
    attachEvent(dateFilterDropdown, 'change', (event) => {
        handleDateDropdownSelection(event);
    });
}

if (applyFilterBtn !== null) {
    attachEvent(applyFilterBtn, 'click', (event) => {
        event.preventDefault();

        let minPrice = document.getElementById('min_price').value;
        let maxPrice = document.getElementById('max_price').value;

        if (minPrice === '') {
            minPrice = 0;
        }

        minPrice = parseFloat(minPrice);
        maxPrice = parseFloat(maxPrice);

        if (isNaN(minPrice) || isNaN(maxPrice)) {
            reportError('Please ensure that prices are in numeric format!');
        }
        else {
            handlePriceFilter(minPrice, maxPrice);
        }
    });
}

if (searchBtn !== null) {
    attachEvent(searchBtn, 'click', () => handleSearch(searchInput.value));

    attachEvent(searchInput, 'keydown', (event) => {
        if (event.keyCode == 13) {
            let target = event.target;
            handleSearch(target.value);
        }
    });
}

if (arrowFilterBtn !== null) {
    arrowFilterBtn.forEach((arrow) => {
        attachEvent(arrow, 'click', (event) => {
            let target = event.target;
            let classesAssigned = Array.from(target.classList);
            let headerName = target.previousSibling.textContent.trim(); //Use trim() to remove extra whitespace as textContent tends to leave trailing whitespace at the end of the string when accessing previousSibling property.
            let queryParameter = formQueryParameterFromHeader(headerName);
            processSort(queryParameter, classesAssigned.at(1));
        });
    });
}

if (deleteBtns !== null) {
    deleteBtns.forEach((deleteBtn) => {
        deleteBtn.addEventListener('click', function (event) {
            event.preventDefault();

            $.confirm({
                title: 'Delete Confirmation',
                content: 'Once deleted, this action cannot be undone. Are you sure you want to proceed?',
                buttons: {
                    confirm: {
                        text: 'Yes',
                        btnClass: 'btn-green',
                        keys: ['y'],
                        action: () => {
                            let action = deleteBtn.getAttribute('href');
                            let form = document.getElementById('form_delete');
                            form.setAttribute('action', action);
                            form.submit();
                        }
                    },
                    cancel: {
                        text: 'No',
                        btnClass: 'btn-red',
                        keys: ['n'],
                        action: () => {
                            return;
                        }
                    }
                }
            });
        });
    });
}

if (viewModeBtn !== null) {
    attachEvent(viewModeBtn, 'click', (event) => {
        event.preventDefault();
        let target = event.target;
        let tagName = target.tagName;

        let classes = null;

        if (tagName === 'I') {
            classes = Array.from(target.classList);
        } else if (tagName === 'A') {
            classes = Array.from(target.firstChild.classList);
        }

        let viewMode = classes.at(1);
        processViewMode('view_mode', viewMode);
    });
}

if (removeProfilePictureBtn !== null) {
    attachEvent(removeProfilePictureBtn, 'click', (event) => {
        event.preventDefault();
        removeProfilePicture(event);
    });
}

// $(document).ready(function () {
//     $('#register_form').validate({
//         rules: {
//             name: {
//                 required: true,
//                 minlength: 3
//             }
//         }
//     });
// });

Fancybox.bind("[data-fancybox]", {
    hideScrollbar: false,
    dragToClose: true,
    showClass: "f-fadeIn",
    hideClass: "f-scaleOut"
});