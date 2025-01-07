const handleDropdownSelection = (event) => {
    const target = event.target;
    let selectedCategoryId = target.value || target.options[target.selectedIndex].value;
    window.location.href = window.location.href.split('?')[0] + "?category_id=" + selectedCategoryId;
}

const attachEvent = (target, event, callback) => target.addEventListener(event, callback);

const categoryFilterDropdown = document.getElementById('filter_category_id');

if(categoryFilterDropdown !== null) {
    attachEvent(categoryFilterDropdown, 'change', (event) => {
        handleDropdownSelection(event);
    });
}