const attachQueryParameterToUrl = (parameter, value) => {
    const currentUrl = new URL(window.location.href);
    const queryParameters = new URLSearchParams(currentUrl.search);

    queryParameters.delete(parameter);
    queryParameters.append(parameter, value);

    currentUrl.search = queryParameters.toString();
    return currentUrl;
};

const handleDateDropdownSelection = (event) => {
    const target = event.target;
    let selectedOrderId = target.value || target.options[target.selectedIndex].value;
    window.location.href = attachQueryParameterToUrl('date', selectedOrderId);
};

const handleCategoryDropdownSelection = (event) => {
    const target = event.target;
    let selectedCategoryId = target.value || target.options[target.selectedIndex].value;
    window.location.href = attachQueryParameterToUrl('category_id', selectedCategoryId);
};

const attachEvent = (target, event, callback) => target.addEventListener(event, callback);

const categoryFilterDropdown = document.getElementById('filter_category_id');
const dateFilterDropdown = document.getElementById('filter_date');

if(categoryFilterDropdown !== null) {
    attachEvent(categoryFilterDropdown, 'change', (event) => {
        handleCategoryDropdownSelection(event);
    });

    attachEvent(dateFilterDropdown, 'change', (event) => {
        handleDateDropdownSelection(event);
    });
};