import urllib.request
import json


requestURL = 'https://www.gs4u.net/en/vkapp.json?id=g6738030'
server_id_to_print = 'all' # or ServerID as string to print only 1 server


def print_server(srv):
    print('Server ID: ' + srv['id'])
    print('Server name: ' + srv['name'])
    if srv['status'] == '1':
        print('Server is Online')
    else:
        print('Server is Offline')
    print('IP:Port: : ' + srv['port'])
    print('Map: ' + srv['map'])
    print('Players: ' + srv['players'] + ' / ' + srv['players_max'])
    print('From: ' + srv['country'] + ', ' + srv['city'])
    print('Game: ' + srv['game'])
    print('----------------------------------------------------------------------------')

servers_json_string = urllib.request.urlopen(requestURL).read()
servers = json.loads(servers_json_string)
for server in servers:
    if server_id_to_print == 'all':
        print_server(server)
    else:
        if server['id'] == server_id_to_print:
            print_server(server)
