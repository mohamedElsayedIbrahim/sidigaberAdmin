export function loader(dialog) { 
    let loader = document.createElement('div');
    loader.classList.add('bg-light','position-absolute','top-0','start-0','w-100','h-100','z-1','d-flex','align-items-center','justify-content-center')
    loader.innerHTML = '<i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>'
    dialog.classList.add('position-relative');
    dialog.insertAdjacentElement('afterbegin',loader);
    return loader;
}