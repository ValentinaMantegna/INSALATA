# INSALATA
tabella Ruffinengo

Quando ricevo un offerta al prezzo x

- Inserisco l'offerta e ne ottengo l'id oferta
- Prendo le domande where prezzo >= prezzo desc order by limit 1
- Se c'è almeno una domanda prendo id_domanda
- Update items set done 1 id controparte = idofferta where id_domanda
- Se non c'è non faccio nulla

IPOTESI DI QUERY

Select *, sum(quantita) as totale,prezzo from `item` where tipo = 'O' and done =1 group by prezzo;

SELECT *, SUM(quantita) AS totale, prezzo FROM `item` WHERE tipo = 'O' GROUP BY prezzo;

Select *, sum(quantita) as totale,prezzo from `item` where tipo = 'D' group by prezzo; 


- aggiungere done alla tabella. 0 di default. se è stato fatto diventa 1 e non è più visibile
- id_controparte : default a 0 e viene associato id uguale al prezzo della mia domanda