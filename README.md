# Catering / Objednávkový systém

Tento projekt je jednoduchá webová aplikácia postavená v **Laraveli**, slúžiaca na správu cateringových objednávok.

Aplikácia má **dva typy používateľov**:
- **Admin** – plná správa systému
- **User** – iba čítanie (read-only)

---
---

## 🧪 Spustenie projektu

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

## 🧑‍🤝‍🧑 Používateľské roly

### 👤 User (bežný používateľ)
User má **iba prístup na čítanie**:
- môže si prezerať zoznam objednávok

User **NEMÔŽE**:
- vytvárať objednávky
- upravovať objednávky
- mazať objednávky
- pridávať alebo mazať položky

V UI sa mu **nezobrazujú žiadne akčné tlačidlá** (create, edit, delete).

---

### 🛠 Admin
Admin má **plný prístup**:
- CRUD nad používateľmi
- CRUD nad jedlami (foods)
- CRUD nad objednávkami
- pridávanie a mazanie položiek objednávky

Admin má samostatné routy chránené `AdminMiddleware`.

---

## 🔐 Autentifikácia
- prihlásenie pomocou login formulára
- odhlásenie dostupné len pre prihláseného používateľa
- všetky citlivé routy sú chránené middleware `auth`
- admin funkcie sú chránené middleware `AdminMiddleware`

---

## 🧭 Routing – prehľad

### User (auth, read-only)
- `GET /orders-read`  
  Zobrazenie objednávok iba na čítanie

### Admin (auth + admin)
- `/users` – správa používateľov
- `/foods` – správa jedál
- `/orders` – správa objednávok
- `/orders/{order}/items` – správa položiek objednávky

User **nemá prístup k žiadnym POST / PUT / DELETE routám**.

---

## 📦 Modely

### Order
Reprezentuje objednávku (názov, dátum, čas, počet osôb, vyzdvihnutie atď.).

### OrderItem
Položka objednávky:
- neobsahuje vzťah na `Food`
- obsahuje len:
  - názov položky
  - množstvo

Model `Food` slúži **len ako pomôcka pre admina** (rýchly výber názvu položky).

---

## 🖥 View vrstvy

### Admin view
- umožňuje vytvárať, upravovať a mazať dáta
- obsahuje všetky akčné tlačidlá

### User view (read-only)
- používa ten istý view súbor
- správanie je riadené premennou `$readonly`
- ak `$readonly = true`, nezobrazujú sa žiadne akčné prvky

---

## 🔒 Bezpečnosť
- User nemá definované žiadne mutačné routy
- Aj pri manuálnom pokuse (Postman, URL) dostane `403` alebo `404`
- UI aj backend sú striktne oddelené podľa rolí


