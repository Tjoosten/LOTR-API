http://www.domain.com/gender/:gender
===============================================

## Possible Values

| Value:        | Type:       |
| :------------ | :---------- |
| `Male`        | `string`    |
| `Female`      | `string`    |

## Return (Curl)

```bash
HTTP/1.1 200 OK
Host: localhost
Connection: close
X-Powered-By: PHP/5.5.14
Content-Type: text/html
```

## Return (json array)

**Note:** This array will repeat itself for each found record.

```json
[{
  "swapi_id":8,
  "Name":"Galadriel",
  "Other_names":"Altariel, Artanis, Nerwen",
  "Title":"Lady of Lorien, Lady of the Galadhrim, Lady of the wood, Lady of light",
  "Birth":"YT 1362",
  "Death":"Still alive",
  "Weapon":"Elven Magic, Nenya",
  "Race":"Elves",
  "Culture":"Noldor, Falmari, Galadhrim",
  "Gender":"Female",
  "Height":"Tall",
  "Hair_Color":"Golden",
  "Eye_color":"Light Blue",
  "Realms_ruled":"Lothlorien, Caras,Galadhon"
}]
```
