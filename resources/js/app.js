require('./bootstrap');

const form = document.querySelector('.add')
const search = document.querySelector('.search input')
let list = document.querySelector('.todos')

// create task
const createTask = task => {
    fetch('/api/todo',{
        method: 'post',
        headers: {
            'Accept' : 'application/json',
            'Cotent-Type': 'application/json',
        },
        body: JSON.stringify({name:task}),
    }).then(response => response.json)
        .then(data => {
            console.log(data);
            list.innerHTML += `<li class="list-group-item">${task}<span class="delete material-icons float-right" data-id="${data.id}">delete_outline</span></li>`
        });

}

form.addEventListener('submit', e => {
    e.preventDefault()

    // get input and remove spaces
    const task = form.task.value.trim().toLowerCase()

    // add task to list
    if(task.length) {
        createTask(task)
    }

    // reset form
    form.reset()
})

// delete task - event delegation
list.addEventListener('click', e => {
    if(e.target.classList.contains('delete')) {
        var id = e.target.dataset.id;
        fetch('/api/todo/'+id,{
            method: 'delete',
            headers: {
                'Accept' : 'application/json'
            },
        }).then(response => response.json)
            .then(data => console.log(data));
        e.target.parentElement.remove()
    }
})

// filter tasks
const filterTodos = word => {
    const tasks = Array.from(list.children)

    // hide if doesn't match
    tasks.filter(task => !task.textContent.includes(word))
        .forEach(task => task.classList.add('hide'))

    // show if match
    tasks.filter(task => task.textContent.includes(word))
        .forEach(task => task.classList.remove('hide'))
}

// search tasks
search.addEventListener('keyup', () => {
    const word = search.value.trim().toLowerCase()
    filterTodos(word)
})
