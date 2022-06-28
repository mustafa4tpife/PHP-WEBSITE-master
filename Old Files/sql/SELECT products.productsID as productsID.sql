SELECT products.productsID as productsID,
descrptions.productsID as pid,
products.productsName,
descrptions.descrptionsname
from products,descrptions where products.productsID = descrptions.productsID and descrptions.langugesid = 2;