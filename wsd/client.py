from zeep import Client

client = Client('http://localhost/ToCode3_2/wsd/Equation.wsdl')
result = client.service.solve(1,1,1)

print(result)
