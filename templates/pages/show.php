<div>

    <?php $note = $params['note'] ?? null; ?>
    <?php if($note): ?>

    <ul>
        <li> <b>Id:</b> <?php echo $note['id'] ?> </li>
        <li> <b>Tytuł:</b> <?php echo $note['title'] ?> </li>
        <li> <b>Opis:</b> <?php echo $note['description'] ?> </li>
        <li> <b>Zapisano:</b> <?php echo $note['created'] ?> </li>
    </ul>

    <a href="/kurs/?action=edit&id=<?php echo $note['id'] ?>">
        <button> Edytuj </button> 
    </a>

    <?php else: ?>
        <div>
            Brak notatki do wyświetlenia
        </div>
    <?php endif; ?>

    <a href="/kurs">
        <button> Powrót do listy notatek </button>
    </a>
</div>