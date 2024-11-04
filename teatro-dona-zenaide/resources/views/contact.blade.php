<form action="/contact" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="message">Mensagem:</label>
        <textarea class="form-control" id="message" name="message" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>