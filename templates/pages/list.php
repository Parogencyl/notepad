<div class="list">
  <section>
  <div class="message">
      <?php
      if (!empty($params['error'])) {
        switch ($params['error']) {
          case 'noteNotFound':
            echo 'Notatka nie została znaleziona.';
            break;
          case 'missingNoteId':
            echo "Niepoprawny identyfikator notatki.";
            break;
        }
      }
      ?>
    </div>

    <div class="message">
      <?php
      if (!empty($params['before'])) {
        switch ($params['before']) {
          case 'created':
            echo 'Notatka została utowrzona.';
            break;
          case 'deleted':
            echo 'Notatka została usunięta.';
            break;
          case 'edited':
            echo "Notatka została zauktualizowana.";
            break;
        }
      }
      ?>
    </div>

    <?php
      $sort = $params['sort'] ?? [];
      $by = $sort['by'] ?? 'title';
      $order = $sort['order'] ?? 'desc';

      $page = $params['page'] ?? [];
      $size = $page['size'] ?? 10;
      $currentPage = $page['number'] ?? 1;
      $pages = $page['pages'] ?? 1;

      $phrase = $params['phrase'] ?? null;
    ?>  

    <div>
      <form class="settings-form" action="/kurs" method="GET">
        <div>
          <label>Wyszukaj: <input type="text" name="phrase" value="<?php echo $phrase ?>"></label>
        </div>
        
        <div>
        <div> Sortuj: </div> 
          <label> Tytuł: <input type="radio" name="sortby" value="title" <?php echo $by === 'title' ? 'checked' : '' ?> > </label>
          <label> Dacie: <input type="radio" name="sortby" value="created" <?php echo $by === 'created' ? 'checked' : '' ?> > </label>
        </div> 
        <div>
        <div> Kierunek sotowania </div>
          <label> Rosnąco: <input type="radio" name="sortorder" value="asc" <?php echo $order === 'asc' ? 'checked' : '' ?> > </label>
          <label> Malejąco: <input type="radio" name="sortorder" value="desc" <?php echo $order === 'desc' ? 'checked' : '' ?> > </label>
        </div>
        <div>
          <div> Rozmiar paczki: </div>
          <label> 1 <input type="radio" name="pagesize" value="1" <?php echo $size === 1 ? 'checked' : '' ?> > </label>
          <label> 5 <input type="radio" name="pagesize" value="5" <?php echo $size === 5 ? 'checked' : '' ?> > </label>
          <label> 10 <input type="radio" name="pagesize" value="10" <?php echo $size === 10 ? 'checked' : '' ?> > </label>
          <label> 25 <input type="radio" name="pagesize" value="25" <?php echo $size === 25 ? 'checked' : '' ?> > </label>
        </div>
        <input type="submit" value="Wyślij">
      </form>
    </div>

    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tytuł</th>
            <th>Data</th>
            <th>Opcje</th>
          </tr>
        </thead>
      </table>
    </div>

    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <?php foreach($params['notes'] ?? [] as $note): ?>
            <tr>
              <td> <?php echo (int) $note['id'] ?> </td>
              <td> <?php echo htmlentities($note['title']) ?> </td>
              <td> <?php echo htmlentities($note['created']) ?> </td>
              <td> 
                <a href="/kurs/?action=show&id=<?php echo (int) $note['id'] ?>"> <button> Szczegóły </button> </a>
                <a href="/kurs/?action=delete&id=<?php echo (int) $note['id'] ?>"> <button> Usuń </button> </a>
               </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <?php 
      $paginationUrl = "&pagesize=$size&sortby=$by&sortorder=$order&phrase=$phrase";
    ?>

    <ul class="pagination">
    <?php if($currentPage > 1): ?>
      <li>
        <a href="/kurs/?page=<?php echo $currentPage-1 . $paginationUrl ?>"> 
          <button> << </button>
        </a>
      </li>
    <?php endif; ?>

      <?php for($i=1; $i <= $pages; $i++): ?>
        <li>
          <a href="/kurs/?page=<?php echo $i . $paginationUrl?>"> 
            <button> <?php echo $i ?> </button>
          </a>
        </li>
      <?php endfor; ?>

    <?php if($currentPage < $pages): ?>
      <li>
        <a href="/kurs/?page=<?php echo $currentPage + 1 . $paginationUrl?>"> 
          <button> >> </button>
        </a>
      </li>
    <?php endif; ?>
    </ul>

  </section>
</div>