# Shopping cart app

## Technical Requirements

- PHP7 +
- Recommended to use `Composer` for autoloading
- 3rd party libraries can be used if needed
- App should be executed from console
- Solution's source code should be provided in a GIT repository

## Task

### User story

Client asked us to develop Shopping cart app where customers can add, update and remove products. Products can be added in different quantities and currencies. At the moment, our client wants to support 3 currencies: `EUR`, `USD` and `GBP` with possibility to add more in the future. After every newly added/removed product the total balance of the cart should update.

### Requirements

- Supported currencies `EUR`, `USD` and `GBP`
- Exchange rates for currencies: `EUR:USD` - `1:1.14`, `EUR:GBP` - `1:0.88`

### Data

Data is stored in text file where each column is separated by `;` character. There are 5 columns in each row:

1. Unique product identifier
2. Product name
3. Product quantity
4. Product price
5. Product's price currency

Product quantity column describes customer action. If quantity is 1 or more then product is being added/updated, if quantity is -1 or less, then product is being removed from shopping cart.

See example data set is below.

```
mbp;Macbook Pro;2;29.99;EUR
zen;Asus Zenbook;3;99.99;USD
mbp,Macbook Pro;5,100.09,GBP
zen;Asus Zenbook;-1;;
len;Lenovo P1;8;60.33;USD
zen;Asus Zenbook;1;120.99;EUR
```
