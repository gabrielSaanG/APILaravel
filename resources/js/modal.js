export function openModal(livro){
    const modal = document.getElementById("editModal")
    const form = document.getElementById("editForm")

    document.getElementById("tituloInput").value = livro.titulo
    document.getElementById("generoInput").value = livro.genero
    document.getElementById("anoInput").value = livro.ano
    document.getElementById("editoraInput").value = livro.editora

    form.action = `/livros/${livro.id}`

    modal.classList.remove('hidden')
    modal.classList.add("flex")

}

export function closeModal(){
    const modal = document.getElementById("editModal")
    modal.classList.add("hidden")
    modal.classList.remove('flex')
}

