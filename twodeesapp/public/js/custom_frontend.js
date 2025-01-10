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

const handlePriceFilter = (event, minimum = 0, maximum) => {
    console.log(minimum);
    console.log(maximum);

    if (maximum < minimum) {
        throw new Error('Maximum threshold cannot be less than minimum threshold!');
    }

    window.location.href = attachQueryParametersToUrl({ 'min_price': minimum, 'max_price': maximum });
};

const handleDateDropdownSelection = (event) => {
    const target = event.target;
    let selectedOrderId = target.value || target.options[target.selectedIndex].value;
    window.location.href = attachQueryParametersToUrl({ 'date': selectedOrderId });
};

const handleCategoryDropdownSelection = (event) => {
    const target = event.target;
    let selectedCategoryId = target.value || target.options[target.selectedIndex].value;
    window.location.href = attachQueryParametersToUrl({ 'category_id': selectedCategoryId });
};

const attachEvent = (target, event, callback) => target.addEventListener(event, callback);

const categoryFilterDropdown = document.getElementById('filter_category_id');
const dateFilterDropdown = document.getElementById('filter_date');

const applyFilterBtn = document.getElementById('apply_filter_btn');

if (categoryFilterDropdown !== null) {
    attachEvent(categoryFilterDropdown, 'change', (event) => {
        handleCategoryDropdownSelection(event);
    });

    attachEvent(dateFilterDropdown, 'change', (event) => {
        handleDateDropdownSelection(event);
    });

    attachEvent(applyFilterBtn, 'click', (event) => {
        event.preventDefault();
        const minPrice = document.getElementById('min_price').value;
        const maxPrice = document.getElementById('max_price').value;
        console.log(event.target);
        handlePriceFilter(event, minPrice, maxPrice);
    });
};