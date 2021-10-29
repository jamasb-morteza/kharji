function formatUserResultForSelect2(state) {
    if (!state.id) {
        return state.text;
    }
    img = '';
    if (state.avatar !== 'undefined' && state.avatar !== '') {
        img = `<div class="w-35px mfe-2"><img alt="${state.name}" src="${state.avatar}" class="c-avatar-img"/></div>`;
    }
    email = '';
    if (state.email !== 'undefined' && state.email !== '') {
        email = `<div><small>${state.email}</small></div>`;
    }
    stateElement = `
        <div class="d-flex justify-content-start align-items-center">
            ${img}
            <span>${state.name}${email}</span>
        </div>

    `;
    return $(stateElement);
};
