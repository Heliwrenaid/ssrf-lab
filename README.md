# SSRF LAB
W laboratorium na jednym z hostów zostanie uruchomiony serwer z naszą podatną aplikacją. Adres serwera zostanie podany w czasie trwania laboratorium.

<br>

## Zadanie 1
Zadanie polega na uzyskaniu zasobu, który jest dostępny tylko z poziomu serwera. Jako raport wyślij zrzut ekranu i zmodyfikowane zapytanie, jakiego użyłeś. 
<details>
<summary>Hint</summary>
  <br>
 <ul><li>
    Zauważ, że aplikacja ładuje zasoby przez przekazanie ścieżki do zmiennej GET
 </li></ul>
</details>
<br>

## Zadanie 2
Należy uzyskać dostęp do zdjęcia znajdującego się w folderze /local/secret, który chroniony jest blacklistą.
Można to zrobić na różne sposoby:
- Sposób 1: Blacklistę można ominąć tworząc własną stronę, która przekierowuje na adres localhost z odpowiednią ściężką do zasobu. W tym celu:
	- uruchom xampp'a, następnie edytuj plik index.php
	- skorzystaj z funkcji [header](https://www.php.net/manual/en/function.header.php)

- Sposób 2: można próbować wpisywać różne payload'y i liczyć na to, że nie są na blackliście :D

<br>

## Zadanie 3
Trzeba dostać się do pliku /secret/file. Aplikacja blokuje wszystkie zasoby pod adresem /secret za pomocą 2-elementowej whitelisty. Dla uproszczenia została stworzona [lista](list.txt), na której znajdują się dozwolone nazwy hostów. Sugerujemy skorzystać z narzędzia Intruder z programu Burp Suite.
