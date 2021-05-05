<div>

    <?php $note = $params['note'] ?? null; ?>
    <?php if($note): ?>

    <ul>
        <li> <b>Id:</b> <?php echo $note['id'] ?> </li>
        <li> <b>Tytuł:</b> <?php echo $note['title'] ?> </li>
        <li> <b>Opis:</b> <?php echo $note['description'] ?> </li>
        <li> <b>Zapisano:</b> <?php echo $note['created'] ?> </li>
    </ul>

    <form method="POST" action="/kurs/?action=delete">
        <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
        <button type="submit"> Usuń </button> 
    </form>

    <?php else: ?>
        <div>
            Brak notatki do wyświetlenia
        </div>
    <?php endif; ?>

    <a href="/kurs">
        <button> Powrót do listy notatek </button>
    </a>
</div>